<?php
/**
 * @author  Ersin Keser <ersin@7style.net>
 * @package Admin IndexController
 *
 */


namespace Console\Controller;

use Zend\Console\ColorInterface;
use Zend\Console\Request;
use Zend\Mvc\Controller\AbstractActionController;

class DoController extends AbstractActionController
{


    /**
     * @return array|void
     * @throws \RuntimeException
     */
    public function indexAction()
        {
        $request = $this->getRequest();
        if (!$request instanceof Request) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        $console = \Zend\Console\Console::getInstance();
        $tableName = $request->getParam('table', false);
        $moduleName = $request->getParam('module', false);

        //=========================================================================================================
        // Check Module Folder
        //=========================================================================================================
        $baseFolder = getcwd() . '/module/';
        $moduleFolder = $baseFolder . ucfirst($moduleName);
        if (!is_dir($moduleFolder)) {
            $console->write("Error: Module folder '" . $moduleFolder . "' doesn't exist" . PHP_EOL, ColorInterface::WHITE, ColorInterface::LIGHT_RED);
            exit ();
        }

        if (!is_writable($moduleFolder)) {
            $console->write("Error: Module folder '" . $moduleFolder . "' is not writable" . PHP_EOL, ColorInterface::WHITE, ColorInterface::LIGHT_RED);
            exit ();
        }


        //=========================================================================================================
        // get database instance
        //=========================================================================================================
        $db = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');

        if (1 == 2) {

            $db = new \Zend\Db\Adapter\Adapter("None");
        }

        //=========================================================================================================
        // get table fields
        //=========================================================================================================
        try {
            $get = $db->query("SHOW fields FROM $tableName")->execute();
            $fields = array();
            foreach ($get as $val) {
                $fields[] = $val['Field'];
            }
        } catch (\Exception $e) {
            $console->write($e->getMessage() . PHP_EOL, ColorInterface::RED, ColorInterface::WHITE);
            exit ();
        }


        //=========================================================================================================
        // generate Entity-File
        //=========================================================================================================

        if (strstr($tableName, '_')) {
            $tableName = explode("_", $tableName);
            $tName = '';
            foreach ($tableName as $tname) {
                $tName .= ucfirst($tname);
            }
            $tableName = $tName;
        }

        $entityFolder = $moduleFolder . '/src/' . ucfirst($moduleName) . '/Entity/';
        if (!is_writable($entityFolder)) {
            $console->write("Error: Entity folder '" . $entityFolder . "' is not writable" . PHP_EOL, ColorInterface::WHITE, ColorInterface::LIGHT_RED);
            exit ();
        }

        $entityFile = $entityFolder . ucfirst($tableName) . 'Entity.php';
        $fileHandle = fopen($entityFile, "w");
        $getFileContent = $this->generateFileContent($fields, $tableName, $moduleName);

        if (fwrite($fileHandle, $getFileContent)) {
            $console->writeLine();
            $console->write("Entity File: '$entityFile' created'" . PHP_EOL, ColorInterface::GREEN, ColorInterface::BLACK);
            $console->writeLine();
        }


        //=========================================================================================================
        // generate Interface-File
        //=========================================================================================================
        $entityFile = $entityFolder . ucfirst($tableName) . 'EntityInterface.php';
        $fileHandle = fopen($entityFile, "w");
        $getFileContent = $this->generateInterfaceFileContent($fields, $tableName, $moduleName);

        if (fwrite($fileHandle, $getFileContent)) {
            $console->writeLine();
            $console->write("Interface File: '$entityFile' created'" . PHP_EOL, ColorInterface::GREEN, ColorInterface::BLACK);
            $console->writeLine();
        }

        }


    /**
     * generate entity file
     *
     * @param $fields
     * @param $tableName
     * @param $moduleName
     *
     * @return string
     */
    private function generateFileContent($fields, $tableName, $moduleName)
        {

        $date = date('Y/m/d');
        $tableName = ucfirst($tableName);
        $moduleName = ucfirst($moduleName);

        $properties = $this->generateProperties($fields);
        $setterAndGetter = $this->generateSetterAndGetter($fields);


        $output = <<<EOT
<?php
/**
 * Generate with EntityCreater from 7Style.Net
 * @package    $tableName
 * @version 1.0.0
 * @date $date
 */

/**
 * namespace definition and usage
 */
namespace $moduleName\Entity;


/**
 * {$tableName} entity
 *
 * @package $moduleName
 */
class {$tableName}Entity implements {$tableName}EntityInterface
{

$properties
$setterAndGetter


    /**
     * @param array \$array
     */
    public function exchangeArray(array \$array)
    {
        foreach (\$array as \$key => \$value) {
            if (empty(\$value)) {
                continue;
            }
            \$method = 'set' . ucfirst(\$key);
            if (!method_exists(\$this, \$method)) {
                continue;
            }
            \$this->\$method(\$value);
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        \$data = array ();
        foreach (\$this->arrayMap as \$map) {
            \$method = 'get' . ucfirst(\$map);
            if (!method_exists(\$this, \$method)) {
                continue;
            }
            \$data[\$map]  = \$this->\$method();
        }
        return \$data;
    }

}

EOT;

        return $output;
        }


    /**
     * @param $fields
     *
     * @return string
     */
    private function generateProperties($fields)
        {
        $properties = "";
        foreach ($fields as $field) {
            $properties .= <<<EOT
    protected \${$field};

EOT;
        }

        $properties .= <<<EOT
     \n
     /* Set Array Map
     * @var array
     */
     protected \$arrayMap = array(\n
EOT;

        foreach ($fields as $field) {
            $properties .= <<<EOT
            "$field",

EOT;
        }
        $properties .= <<<EOT
     );
EOT;
        return $properties;
        }


    /**
     * @param $fields
     *
     * @return string
     */
    private function generateSetterAndGetter($fields)
        {
        $gAnds = '';

        foreach ($fields as $field) {
            $setterField = ucfirst($field);
            $gAnds .= <<<EOT

    /**
     * Set {$field}
     * @param {$field}
     */
     function set{$setterField}(\${$field})
     {
         \$this->{$field} = \${$field};
     }

    /**
     * Get {$field}
     * @param {$field}
     */
     function get{$setterField}()
     {
         return \$this->{$field};
     }

EOT;
        }


        return $gAnds;

        }


    /**
     * generate InterfaceClass
     *
     * @param $fields
     * @param $tableName
     * @param $moduleName
     *
     * @return string
     */
    private function generateInterfaceFileContent($fields, $tableName, $moduleName)
        {

        $tableName = ucfirst($tableName);
        $moduleName = ucfirst($moduleName);

        $output = <<<EOT
<?php
/**
 * namespace definition and usage
 */
namespace $moduleName\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Project entity interface
 */
interface {$tableName}EntityInterface extends ArraySerializableInterface
{

EOT;

        foreach ($fields as $field) {
            $field = ucfirst($field);
            $output .= <<<EOT
    function set{$field}(\${$field});
    function get{$field}();\n
EOT;

        }

        $output .= <<<TYPEOTHER
}
TYPEOTHER;


        return $output;
        }


}
