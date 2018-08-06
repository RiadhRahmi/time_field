<?php
namespace Drupal\time_field\Plugin\Field\FieldFormatter;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'Time' formatter.
 *
 * @FieldFormatter(
 *   id = "time_formatter",
 *   label = @Translation("Time text"),
 *   field_types = {
 *     "time_type"
 *   }
 * )
 */
class TimeDefaultFormatter extends FormatterBase {

    /**
     * {@inheritdoc}
     */
    public function settingsSummary() {
        $summary = [];
        $summary[] = $this->t('Displays the time string.');
        return $summary;
    }


    /**
     * Builds a renderable array for a field value.
     *
     * @param \Drupal\Core\Field\FieldItemListInterface $items
     *   The field values to be rendered.
     * @param string $langcode
     *   The language that should be used to render the field.
     *
     * @return array
     *   A renderable array for $items, as an array of child elements keyed by
     *   consecutive numeric indexes starting from 0.
     */
    public function viewElements(\Drupal\Core\Field\FieldItemListInterface $items, $langcode)
    {
        $element = [];

        foreach ($items as $delta => $item) {
            // Render each element as markup.
            $element[$delta] = ['#markup' => $item->value];
        }

        return $element;
    }
}