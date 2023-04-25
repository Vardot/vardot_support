<?php

namespace Drupal\vardot_subscription\EventSubscriber;

use Drupal\automated_cron\EventSubscriber\AutomatedCron;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\site_audit_report_entity\Entity\SiteAuditReport;
use Drupal\site_audit_send\Event\SiteAuditSentEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Site Audit Remote Client event subscriber.
 */
class VardotSubscriptionEventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      SiteAuditSentEvent::EVENT_NAME => 'onReportSent'
    ];
  }

  /**
   * Subscribe to the user login event dispatched.
   *
   * @param SiteAuditSentEvent $event
   */
  public function onReportSent(SiteAuditSentEvent $event) {
    // Save subscription end date.
    if ($expires = $event->response->getHeader('VardotSupportExpires')) {
      $expires = $expires[0];
      \Drupal::state()->set('vardot_subscription_end_date', $expires);
    }

    if ($status = $event->response->getHeader('VardotSupportStatus')) {
      \Drupal::state()->set('vardot_subscription_is_active', $status[0] == "active");
    }

    if ($url = $event->response->getHeader('VardotSupportUrl')) {
      \Drupal::state()->set('vardot_subscription_support_url', $url[0]);
    }

    if ($widget = $event->response->getHeader('VardotSupportWidget')) {
      \Drupal::state()->set('vardot_subscription_support_widget', $widget[0]);
    }
  }
}
