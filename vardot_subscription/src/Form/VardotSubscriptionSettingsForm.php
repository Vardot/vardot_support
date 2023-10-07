<?php

namespace Drupal\vardot_subscription\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a form for Vardot Subscription settings.
 */
class VardotSubscriptionSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('vardot_subscription.settings');

    $form['title'] = [
      '#markup' => t('<h1>Vardot Subscription Settings</h1>'),
    ];

    $form['project_key'] = [
      '#type' => 'textfield',
      '#title' => t('Project Key'),
      '#default_value' => $config->get('project_key'),
      '#description' => t('Please add the project ID found on JIRA'),
      '#collapsible' => FALSE,
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => t('Save settings'),
      '#submit' => ['vardot_subscription_settings_submit'],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'vardot_subscription_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'vardot_subscription.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Save JIRA ID in configurations, to be attached to VPC endpoint.
    $values = $form_state->getValues();
    $this->config('vardot_subscription.settings')
      ->set('project_key', $values['project_key'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
