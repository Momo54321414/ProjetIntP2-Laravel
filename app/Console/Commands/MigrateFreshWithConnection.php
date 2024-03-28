<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrateFreshWithConnection extends Command
{
    protected $signature = 'migrate:fresh:connection {connection}';

    protected $description = 'Drop all tables from a specific connection and run the migrations';

    public function handle()
    {
        $connectionName = $this->argument('connection');

        $schema = DB::connection($connectionName)->getSchemaBuilder();
    
        $schema->disableForeignKeyConstraints();
    
        $tableNames = $schema->getConnection()->getDoctrineSchemaManager()->listTableNames();
    
        foreach ($tableNames as $tableName) {
            $schema->drop($tableName);
        }
    
        $schema->enableForeignKeyConstraints();
    
        $this->call('migrate', ['--database' => $connectionName]);
    
        $this->info('Database migrated successfully.');
    }
}
