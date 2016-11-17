<?php
/**
 * A field type for selecting an item from a collection.
 *
 * Attributes:
 * collection: Required. The name of the collection.
 * options: Required. The ID of a field in the collection to populate the select box with.
 * values: Optional. The ID of another field in the collection to take the values from. If omitted, the internal itemID is used.
 *
 * Examples:
 * <perch:content id="book" type="collectionlist" collection="Books" label="Book" options="title" />
 * <perch:content id="book" type="collectionlist" collection="Books" label="Book" options="title" values="isbn" />
 *
 */
class PerchFieldType_collectionlist extends PerchAPI_FieldType
{

    public function render_inputs($details=array())
    {
        $id  = $this->Tag->input_id();
        $val = '';

        if (isset($details[$id]) && $details[$id]!='') {
            $val = $details[$id];
        }

        if (!class_exists('PerchContent_Collections')) {
            include_once(PERCH_CORE.'/runway/apps/content/PerchContent_Collections.class.php');
        }

        $Collections = new PerchContent_Collections();
        $Collection = $Collections->get_one_by('collectionKey', $this->Tag->collection());

        $opts   = array();
        $opts[] = array('label'=>'', 'value'=>'');

        if ($Collection) {
            $CollectionItems = $Collection->get_items();
            if (PerchUtil::count($CollectionItems)) {
                foreach($CollectionItems as $Item) {
                    $values = $this->Tag->values() ? $Item->get_field($this->Tag->values()) : $Item->itemID();
                    $opts[] = array('label'=>$Item->get_field($this->Tag->options()), 'value'=>$values);
                }
            }
        }

        if(PerchUtil::count($opts)) {
            $s = $this->Form->select($id, $opts, $val);
        } else {
            $s = '-';
        }

        return $s;

    }

    public function get_raw($post=false, $Item=false)
    {
        $store  = '';
        $id     = $this->Tag->id();
        if ($post===false) $post = $_POST;

        if (isset($post[$id])) {
            $store = $post[$id];
        }

        return $store;
    }

    public function get_processed($raw=false)
    {
        return $raw;
    }

    public function get_search_text($raw=false)
    {
        return false;
    }
}
?>
