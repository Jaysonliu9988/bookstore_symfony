<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\DbService;


class DbInsertCommand extends Command
{
    protected static $defaultName = 'db:add';
    protected static $defaultDescription = 'Insert a data';

    private $DbService;

    public function __construct(DbService $DbService){
        $this->DbService=$DbService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('book_name', InputArgument::REQUIRED, 'The name of the book.')
            ->addArgument('book_publisher', InputArgument::REQUIRED, 'The publisher of the book.')
            ->addArgument('book_price', InputArgument::REQUIRED, 'The price of the book.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $res=$this->DbService->insert($input->getArgument('book_name'),$input->getArgument('book_publisher'),$input->getArgument('book_price'));
        $io->success($res);
        
        return Command::SUCCESS;
    }
}
