<?php

# oauth-server/src/Application/ServerBundle/Command/CreateOauthClientCommand.php
namespace AuthenticateBundle\Command;

use FOS\OAuthServerBundle\Entity\Client;
use FOS\OAuthServerBundle\Entity\ClientManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateOauthClientCommand extends Command
{
  const GRANT_TYPE = 'grant-type';

  private $clientManager;

  public function __construct(ClientManager $clientManager)
  {
    parent::__construct();

    $this->clientManager = $clientManager;
  }

//Public ID: 2_1w6gwy6mj6yskssoc4044k4co4wosgck800o044kgo004gwgww
//Secret ID: 4mftuj5k804ko0ssg88cgo4o4kkkosswggw8gc4sw4kg0ogksk

//  php bin/console create:oauth:client --grant-type="token" --grant-type="password" --grant-type="refresh_token"
  protected function configure()
  {
    $this
      ->setName('create:oauth:client')
      ->setDescription('Creates a new OAuth client.')
      ->addOption(
        self::REDIRECT_URI,
        null,
        InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
        'Sets redirect uri for client. Can be used multiple times.'
      )
      ->addOption(
        self::GRANT_TYPE,
        null,
        InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
        'Sets allowed grant type for client. Can be used multiple times.'
      );
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    /** @var Client $client */
    $client = $this->clientManager->createClient();
    $client->setRedirectUris($input->getOption(self::REDIRECT_URI));
    $client->setAllowedGrantTypes($input->getOption(self::GRANT_TYPE));

    $this->clientManager->updateClient($client);

    $this->echoCredentials($output, $client);
  }

  private function echoCredentials(OutputInterface $output, Client $client)
  {
    $output->writeln('OAuth client has been created...');
    $output->writeln(sprintf('Public ID: %s', $client->getPublicId()));
    $output->writeln(sprintf('Secret ID: %s', $client->getSecret()));
  }
}