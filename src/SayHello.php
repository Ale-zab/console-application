<?php
// src/Command/CreateUserCommand.php
namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class SayHello extends Command
{
    protected static $defaultName = 'app:create-user';

    protected function configure(): void
    {
        $this
            ->addArgument('text_user', InputArgument::REQUIRED, 'The text of the user.')
            ->setName('say_hello')
            ->setDescription('')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Привет ' . $input->getArgument('text_user'));
        return Command::SUCCESS;
    }
}