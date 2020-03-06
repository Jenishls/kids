<?php
/**
 * Created by PhpStorm.
 * User: REACT DEV RAKESH
 * Date: 11/28/2019
 * Time: 12:11 PM
 */

namespace App\Traits;

use App\Model\Activity;

trait ActivityTrait
{
    protected static function bootActivityTrait(){
        foreach(static::getEvents() as $event){
            static::$event(function($instance) use ($event){
                $log = $instance->recordLog($event);
                if($instance->isDirty()){
                    $log->updateComment($instance->logComment($instance->getDirty(), $instance->deleteRecoverObservers($event)));
                }
            });
        }
    }

    /**
     * Decide the event is deleted, recovered or other events
     * @param $event
     * @return string
     */
    protected function deleteRecoverObservers($event) :string {
        if($this->isDirty('is_deleted')){
            if($this->is_deleted){
                return "deleted";
            }
            return "recovered";
        }
        return $event;
    }

    /**
     * Columns that shouldn't be showed in comment
     * @return array
     */
    protected  function keysToRemove(){
        return ['id','updated_at','useru_id', 'created_at', 'deleted_at'];
    }

    /**
     * Specify which model observers will have the details included in the comment
     */
    protected function observerCommentDetails() :array {
        return [
            'created' => false,
            'updated' => true,
            'deleted' => false,
            'recovered' => false
        ];
    }

    /* Keys that should not be included in the comment */
    public function sanitizedKeys(array $dirtyArray){
        $keysToRemove = $this->keysToRemove();
        return array_filter(array_keys($dirtyArray), function($key) use($keysToRemove){
            return !in_array($key, $keysToRemove);
        });
    }

    /**
     * Create Comment
     * @param array $dirtyArray
     * @param $event
     * @throws \ReflectionException
     * @return string
     */
    protected function logComment(array $dirtyArray, $event) :string{
        if($this->observerCommentDetails()[$event]){
            $dirtyKeys = $this->sanitizedKeys($dirtyArray);
        }else{
            $dirtyKeys = [];
        }
        return ucfirst(auth()->user()->fullName())." ".$this->getObserverType($event)." ".implode(', ', $dirtyKeys);
    }

    /**
     * Observables
     * @return array
     */
    protected static function getEvents() : array{
        return ['created', 'updated'];
    }

    public function logs()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    /**
     * Store log
     *
     * @param $event
     * @throws \ReflectionException
     * @return Activity
     */
    public function recordLog($event) :Activity
    {
        return $this->logs()->create([
            'user_id' => auth()->id(),
            'type' => $this->getObserverType($event)
        ]);
    }

    /**
     * Get Observer Type
     *
     * @param $event
     * @return string
     * @throws \ReflectionException
     */
    protected function getObserverType($event){
        return $event." ".strtolower((new \ReflectionClass($this))->getShortName());
    }

}