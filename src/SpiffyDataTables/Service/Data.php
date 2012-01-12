<?php
namespace SpiffyDataTables\Service;
use RuntimeException;

class Data
{
    protected $types = array(
        'link'    => 'cbLink',
        'jsClick' => 'cbJsClick',
    );
    
    public function format(array &$data, array $spec)
    {
        foreach($spec as $name => $s) {
            $cb = $this->types[$s['type']];
            foreach($data as $key => $value) {
                $data[$key][$name] = $this->$cb($value, $s['options']);
            }
        }
        
        return $data;
    }
    
    public function cbJsClick($data, array $options)
    {
        $replace = array();
        $matches = array();
        $onclick = $options['onclick'];
        
        preg_match_all('/%(\w+)%/', $onclick, $matches);
        
        foreach($matches[1] as $match) {
            if (array_key_exists($match, $data)) {
                $onclick = str_replace("%{$match}%", $data[$match], $onclick);
            }
        }
        
        return sprintf('<a href="#" onclick="%s">%s</a>', $onclick, $options['label']);
    }
    
    public function cbLink($data, array $options)
    {
        $replace = array();
        $matches = array();
        $link    = $options['link'];
        
        preg_match_all('/%(\w+)%/', $link, $matches);
        
        foreach($matches[1] as $match) {
            if (array_key_exists($match, $data)) {
                $link = str_replace("%{$match}%", $data[$match], $link);
            }
        }
        
        return sprintf('<a href="%s">%s</a>', $link, $options['label']);
    }
}
