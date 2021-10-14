<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\DbService;


class DbInitCommand extends Command
{
    protected static $defaultName = 'db:init';
    protected static $defaultDescription = 'Add a short description for your command';

    private $DbService;

    public function __construct(DbService $DbService){
        $this->DbService=$DbService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Create table if not exited')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $res=$this->DbService->createTable();
        $io->success($res);
        
        return Command::SUCCESS;
    }
}
