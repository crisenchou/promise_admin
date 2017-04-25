<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ViewComposerGenerator extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:viewcomposer {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new view composer clas';

    protected $type = 'composer';

    public function getStub()
    {
        return __DIR__ . '/../stubs/composer.stub';
    }


    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\ViewComposers';
    }
}
