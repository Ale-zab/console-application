<?php
// src/Command/CreateUserCommand.php
namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class Message extends Command
{
    protected static $defaultName = 'app:create-user';

    protected function configure(): void
    {
        $this
            ->addArgument('message_user', InputArgument::REQUIRED, 'The message of the user.')
            ->addArgument('times', InputArgument::OPTIONAL, 'The quantity repeat message.', 1)
            ->setName('message')
            ->setDescription('')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $times = $input->getArgument('times');

        if (is_numeric($times)) {
            if($times > 0) {
                for($i = 0; $i < $times; $i++) {
                    $output->writeln($input->getArgument('message_user'));
                }
            }
        } else {
            $output->writeln($input->getArgument('message_user'));
        }

        return Command::SUCCESS;
    }
}