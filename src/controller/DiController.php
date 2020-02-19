<?php
namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * An demo controller.
 */
class DiController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Logger.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * Constructs controller object
   *
   * @param LoggerChannelFactoryInterface $logger_factory
   */
  public function __construct(LoggerChannelFactoryInterface $logger_factory) {
    $this->logger = $logger_factory->get('demo');
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container)
  {
    return new static( $container->get('logger.factory'));
  }

  /**
   * Returns a render-able array for a controller page.
   */
  public function events() {
    $this->logger->notice('controller has ben called');
    $this->messenger()->addStatus('Hello ,this is controller page');
    $build = [
      '#markup' => $this->t('Hello World!'),
    ];
    return $build;
    }
}
