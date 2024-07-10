<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service already exists!");
            return;
        }

        $stub = $this->getStub();
        $stub = str_replace('{{ class }}', $name, $stub);

        File::put($path, $stub);
        $this->info("Service created successfully.");
    }

    protected function getStub()
    {
        return <<<EOT
<?php

namespace App\Services;

class {{ class }}
{
    // Your service methods go here
}
EOT;
    }
}
