<?php
// src/Command/CreateUserCommand.php
namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class UserInfo extends Command
{
    protected static $defaultName = 'app:create-user';

    protected function configure(): void
    {
        $this
            ->setName('user_info')
            ->setDescription('')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper   = $this->getHelper('question');

        $question_name   = new Question('Введите ваше имя: ', false);
        $name            = $helper->ask($input, $output, $question_name);

        $question_year   = new Question('Введите ваше возраст: ', false);
        $year            = $helper->ask($input, $output, $question_year);

        $question_gender = new ChoiceQuestion('Ваш пол (м)', ['М', 'Ж'], 0);
        $gender          = $helper->ask($input, $output, $question_gender);

        if (!$name) {
            $name = 'user ' . rand();
        }

        if (!$year) {
            $year = '(не определен)';
        }

        if (!is_numeric($year)) {
            $year = '(не определен)';
        }

        $output->writeln('Здравствуйте, ' . $name . ', Ваш возраст: ' . $year . ', Ваш пол: ' .  $gender);

        return Command::SUCCESS;
    }
}
