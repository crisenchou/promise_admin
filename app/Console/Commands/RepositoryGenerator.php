<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryGenerator extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository  {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new repository class';


    protected $type = 'repository';

    public function getStub()
    {
        return __DIR__ . '/../stubs/repository.stub';
    }


    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }
}
