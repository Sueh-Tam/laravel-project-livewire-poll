<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['first'];

    
    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10', //rule for the array
        'options.*' => 'required|min:1|max:255' //rule for every item in the array
    ];

    protected $messages = [
        'options.*' => 'The option cant be empty'
    ];

    public function render()
    {
        return view('livewire.create-poll');
    } 
    public function addOption(){
        $this->options[] = '';
    }

    public function removeOption($index){
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll(){

        $this->validate(); // verify if all rule is been following

        $poll = Poll::create([
            'title' => $this->title 
        ])->options()->createMany( 
            collect($this->options)
            ->map(fn ($option) => ['name' => $option])
            ->all()
        ); 

        // the code above resume this code below
        /*foreach($this->options as $optionName){
            $poll->options()->create(['name' => $optionName]);
        }*/

        $this->reset(['title','options']);
        //in livew wire 3 do not use emit, but dispatch
        $this->dispatch('pollCreated');
        
    }
    /*public function mount(){

    }*/
}
