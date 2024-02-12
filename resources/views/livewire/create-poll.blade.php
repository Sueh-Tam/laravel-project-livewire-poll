<div>
    <form>
      <label>Poll Title</label>
  
      <input type="text" wire:model.live="title" />
  
      Current title: {{ $title }}
    </form>
    <div class="mb-4 mt-4">
      <button class="btn" wire:click.prevent="addOption">Add option</button>
    </div>
    <div >
      @foreach ($options as $index => $option)
      <div class="mt-4">
        {{ $index }} - {{$option}}
      </div>
      @endforeach
    </div>

  </div> 