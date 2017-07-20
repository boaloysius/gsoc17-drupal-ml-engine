<?php

namespace Drupal\ml_engine\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Routing\UrlGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a list controller for ml_engine_project entity.
 *
 * @ingroup ml_engine_project
 */
class ProjectListBuilder extends EntityListBuilder {

  protected $urlGenerator;

  public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
    return new static(
      $entity_type,
      $container->get('entity.manager')->getStorage($entity_type->id()),
      $container->get('url_generator')
    );
  }

  public function __construct(EntityTypeInterface $entity_type, EntityStorageInterface $storage, UrlGeneratorInterface $url_generator) {
    parent::__construct($entity_type, $storage);
    $this->urlGenerator = $url_generator;
  }

  public function render() {
    $build['description'] = array(
      '#markup' => $this->t('Project List'),
    );
    $build['table'] = parent::render();
    return $build;
  }

  public function buildHeader() {
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $row['first_name'] = $entity->first_name->value;
    return $row + parent::buildRow($entity);
  }

}
