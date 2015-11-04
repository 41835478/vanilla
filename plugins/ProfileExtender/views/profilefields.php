<?php if (!defined('APPLICATION')) exit();

if (is_array($this->ProfileFields)) {
    foreach ($this->ProfileFields as $Name => $Field) {
        $Options = array();
        if ($Field['FormType'] == 'Dropdown') {
            $values = $Field['Options'];
            $labels = (array_key_exists('OptionsLabels', $Field)) ? $Field['OptionsLabels'] : false;

            // If the config provides an array of labels nested in the profile field ($Field['OptionsLabels']),
            // combine the arrays to create a drop-down with different values and labels.
            if(is_array($labels)) {
                // WARNING: If $values and $labels are of different length, $Options will be null.
                $Options = array_combine($values, $labels);
            } else { //
                $Options = array_combine($values, $values);
            }
        }

        if ($Field['FormType'] == 'TextBox' && !empty($Field['Options'])) {
            $Options = $Field['Options'];
        }

        if ($Field['FormType'] == 'CheckBox') {
            continue;
        } else {
            echo wrap($Sender->Form->label($Field['Label'], $Name).
                $Sender->Form->{$Field['FormType']}($Name, $Options), 'li');
        }
    }
}
