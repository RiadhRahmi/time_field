<?php

namespace Drupal\time_field\Element;

use Drupal\Core\Render\Element\FormElement;
use Drupal\Core\Render\Element;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a time_field form element.
 *
 * @FormElement("time_field_element")
 */
class TimeField extends FormElement {

    /**
     * {@inheritdoc}
     */
    public function getInfo() {

        $class = get_class($this);
        return [
            '#input' => TRUE,
            '#multiple' => FALSE,
            '#maxlength' => 512,
            '#size' => 25,
            '#process' => [[$class, 'processTimeField']],
            '#pre_render' => [[$class, 'preRenderTimeField']],
            '#theme_wrappers' => ['form_element'],
            '#theme' => 'input__textfield',
        ];

    }

    /**
     * Render element for input.html.twig.
     *
     * @param array $element
     *   An associative array containing the properties of the element.
     *   Properties used: #title, #value, #description, #size, #maxlength,
     *   #placeholder, #required, #attributes.
     *
     * @return array
     *   The $element with prepared variables ready for input.html.twig.
     */
    public static function preRenderTimeField(array $element) {
        Element::setAttributes($element, ['id', 'name', 'value', 'size']);
        static::setAttributes($element, ['form-time']);
        return $element;
    }

    /**
     * {@inheritdoc}
     */
    public static function processTimeField(&$element, FormStateInterface $form_state, &$complete_form) {


        $element['#attributes']['class'] = ['form-control timepicker-field'];

        // Prefix and Suffix.
        // Prefix and Suffix.
        $element['#prefix'] = "<div class='container'>
    <div class='row'>
        <div class='col-sm-6'>";
        $element['#suffix'] = "</div></div></div>";

        // Attach library.
        $complete_form['#attached']['library'][] = 'time_field/timefield';

        return $element;
    }

    /**
     * Return default settings. Pass in values to override defaults.
     *
     * @param array $values
     *   Some Desc.
     *
     * @return array
     *   Some Desc.
     */
    public static function settings(array $values = []) {
       return $values;
    }

}
