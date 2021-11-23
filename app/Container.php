<?php


namespace Micro7;


class Container implements \ArrayAccess
{
    protected array $items = [];
    protected array $cache = [];

    public function __construct(array $items)
    {
        foreach ($items as $key =>$item){
            $this->offsetSet($key, $item);
        }
    }

    public function offsetExists($offset):bool
    {
     return  isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        if (!$this->has($offset)) {
            return null;
        }
        if (isset($this->cache[$offset])) {
            return $this->cache[$offset];
        }
        $item = $this->items[$offset]($this);
        $this->cache[$offset] = $item;
        return $item;
    }

    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
      if ($this->has($offset)){
          unset($this->items[$offset]);
      };
    }

    public function has($offset){
        return $this->offsetExists($offset);
    }

    public function __get($name)
    {
     return  $this->offsetGet($name);
    }
}
