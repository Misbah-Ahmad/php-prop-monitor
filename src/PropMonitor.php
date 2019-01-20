<?php

namespace PropMonitor;

public class PropMonitor{
    



    public function check($object, array $properties)
    {

        $propCount = count($properties);

        for($i = 0; $i < $propCount; $i++)
        {
            $property = $properties[$i];
            
            if(is_int($property))
            {
                //if $property is of interger type, check whether the current object is of array type && looks for the $property key in that array 
                if(is_array($object) && array_key_exists($property, $object))
                {

                    $object = $object[$property];

                } else {

                    return false;
                }

            } else if(is_numeric($property))
            {
                //$property is a numeric string that contains only numbers
                if(is_object($object))
                {
                    $object = (array) $object;
                }
                
                if(!is_array($object))
                {
                    return false;
                }
                
                if(array_key_exists($property, $object)) 
                {
                    $object = $object[$property];

                } else {
                    return false;
                }
                
            } else {

                if(is_object($object) && property_exists($object, $property))
                {
                    $object = $object->{$property};
                } else {
                    return fasle;
                }

            }

        }

        return true;

    }
   


   



}


