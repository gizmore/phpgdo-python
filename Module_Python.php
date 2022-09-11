<?php
namespace GDO\Python;

use GDO\Core\GDO_Module;
use GDO\Core\GDT_Path;
use GDO\CLI\Process;

/**
 * Python bindings.
 * PATH config.
 * 
 * @author gizmore
 * @version 7.0.1
 * @since 6.10
 */
final class Module_Python extends GDO_Module
{
    public function getConfig() : array
    {
        return [
            GDT_Path::make('python_path')->initial('python')->existingFile(),
        ];
    }
    
    public function cfgPythonPath() : string { return $this->getConfigVar('python_path'); }
    
    public function onLoadLanguage() : void { $this->loadLanguage('lang/python'); }
    
    public function onInstall() : void
    {
        $path = Process::commandPath('python');
        $this->saveConfigVar('python_path', $path);
    }
    
}
