<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\DbService;


class DbListCommand extends Command
{
    protected static $defaultName = 'db:list';
    protected static $defaultDescription = 'Show datas';

    private $DbService;

    public function __construct(DbService $DbService){
        $this->DbService=$DbService;
        parent::__construct();
    }

    protected function configure(): void
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $res=$this->DbService->getdata();
        $arr_header=['ID','Name', 'Publisher','Price'];
        $arr_cols=[];
        foreach ($res as $key => $value) {
            
            $tmp=[];
            $tmp[]=$value->getId();//['id'];//['id'];
            $tmp[]=$value->getBookName();//['book_name'];
            $tmp[]=$value->getBookPublisher();//['book_publisher'];
            $tmp[]=$value->getBookPrice();//['book_price'];
            $arr_cols[]=$tmp;
        }
        
        $io->table($arr_header,$arr_cols);

        
        return Command::SUCCESS;
    }
}
