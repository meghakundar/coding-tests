<?php

namespace Drupal\json_migration\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * An Json Data controller.
 */
class JsonDataController extends ControllerBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * Returns a renderable array for a test page.
   *
   * return []
   */
  public function content() {
    $nids = $this->entityTypeManager
    ->getStorage('node')
    ->getQuery()
    ->accessCheck(TRUE)
    ->sort('type', 'DESC')
    ->execute();
    $nodes = Node::loadMultiple($nids);
    return [
      '#theme' => 'organized_data',
      '#data' => $nodes
    ];
  }
}
