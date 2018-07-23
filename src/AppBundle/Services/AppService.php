<?php
namespace AppBundle\Services;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AppService
{
  private $entityManager;
  private $container;
  protected $eventDispatcher;
  private $tokenStorage;

  public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack,
                              TokenStorageInterface $tokenStorage, ContainerInterface $container, EventDispatcherInterface $eventDispatcher
  )
  {
    $this->container = $container;
    $this->tokenStorage = $tokenStorage;
    $this->entityManager = $entityManager;
    $this->eventDispatcher = $eventDispatcher;
  }

  public function getEntityManager()
  {
    return $this->entityManager;
  }

  public function getContainer()
  {
    return $this->container;
  }

  public function getFileSystem()
  {
    return $this->getContainer()->getParameter('filesystem');
  }

  public function getFileService()
  {
    $fileSystem = $this->getFileSystem();
    return $this->container->get($fileSystem);
  }

  /**
   * @return string
   */
  public function getRootDir()
  {
    return $this->getContainer()->get('kernel')->getRootDir() . '/..';
  }
}