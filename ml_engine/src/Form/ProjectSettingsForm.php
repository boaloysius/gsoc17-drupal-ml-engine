<?php

namespace Drupal\ml_engine\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class ProjectSettingsForm extends FormBase {
  public function getFormId() {
    return 'ml_engine_project_settings';
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['project_settings']['#markup'] = 'Settings form for ML Engine Project. Manage field settings here.';
    return $form;
  }

}
