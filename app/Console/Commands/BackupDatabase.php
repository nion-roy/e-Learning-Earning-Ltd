<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'db:backup';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Backup the database to an SQL file';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $database = env('DB_DATABASE');
    $username = env('DB_USERNAME');
    $password = env('DB_PASSWORD');
    $host = env('DB_HOST');
    $backupPath = storage_path('app/backups/' . $database . '_backup_' . date('Y_m_d_H_i_s') . '.sql');

    $command = "mysqldump --user={$username} --password={$password} --host={$host} {$database} > {$backupPath}";

    $returnVar = NULL;
    $output = NULL;

    exec($command, $output, $returnVar);

    if ($returnVar !== 0) {
      $this->error('Database backup failed');
      return 1;
    }

    $this->info('Database backup was successful');
    return 0;
  }
}
