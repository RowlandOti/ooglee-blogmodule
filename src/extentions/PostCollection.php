<?php  

namespace Extentions;

class PostCollection extends \Illuminate\Database\Eloquent\Collection
{
    public function orderBy($attribute, $order = 'ASC')
    {
        $this->sortBy(function($model) use ($attribute) {
            return $model->{$attribute};
        });

        if ($order == 'DESC') 
        {
            $this->items = array_reverse($this->items);
        }

        return $this;
    }

    // Returns odd records
    public function odds()
    {
        $odd = array();

        foreach ($this->items as $k => $v) 
        {
            if ($k % 2 == 0) $odd[] = $v;
        }

        return new static($odd);   
    }

    // Returns even records
    public function evens()
    {
        $even = array();

        foreach ($this->items as $k => $v) 

        {
            if ($k % 2 !== 0) $even[] = $v;
        }

        return new static($even);
    }

    //This is another dynamic method getWhere($value, $key), 
    //using this method I can get all the records from a collection 
    //where a given attribute matches a value, for example, $users->getWhereFirstName('Mr')
    public function getWhere($value, $key)
    {
        $index = $this->fetch($key)->toArray();
        $collection = array();

        foreach ($index as $k => $val) 
        {
            if($value == $val) $collection[] = $this->items[$k];
        }

        return count($collection) ? new static($collection) : null;
    }

    // The __call() magic method, required for this dynamic getWhere() method
    public function __call($method, $args)
    {
      $key = snake_case(substr($method, 8));
      $args[] = $key;

      return call_user_func_array(array($this, 'getWhere'), $args);
    }

    public function getTime($date, $granularity = 1)
    { 
        //$values = explode(" ", $date);
        
        $time       = new DateTime('now', new DateTimeZone('UTC')); //GET CURRENT UTC TIME
        //$date = $values[0] . "-" . $values[1] ;
        $difference = strtotime($time->format('Y-m-d H:i:s')) - strtotime($date);
        $retval     = '';
        $periods    = array(
            'decade' => 315360000,
            'year' => 31536000,
            'month' => 2628000,
            'week' => 604800,
            'day' => 86400,
            'hour' => 3600,
            'min' => 60,
            'sec' => 1
        );
        
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference / $value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '') . $time . ' ';
                $retval .= (($time > 1) ? $key . 's' : $key);
                $granularity--;
            }
            if ($granularity == '0') {
                break;
            }
        }
        return $retval . ' ago';
    }

    public function getTimeAgo()
    {
        return $this->getTime($model->published_date);
    }

    /**
     * Returns the thumbnail img code or image link defined in the config, for the current item's you tube video id
     *
     * @return string
     */
    public function getYouTubeThumbnailImageOrLink($width, $height, $type)
    {
        if($type == 'code') 
        {   
            $placeholder = array("%YOU_TUBE_VIDEO_ID%","%WIDTH%","%HEIGHT%");
            $replaceholder   = array($model->you_tube_video_id, $width, $height);
            $phrase = \Config::get($model->getConfigPrefix().'you_tube.thumbnail_code');
        }
        elseif($type == 'link')
        {   
            $placeholder = array("%YOU_TUBE_VIDEO_ID%");
            $replaceholder   = array($model->you_tube_video_id);
            $phrase = \Config::get($model->getConfigPrefix().'you_tube.thumbnail_image');
        }

        return str_replace($placeholder, $replaceholder, $phrase);
    }
}