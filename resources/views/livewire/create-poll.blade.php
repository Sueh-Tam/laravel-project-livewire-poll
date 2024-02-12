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
        <label>Option {{ $index + 1 }}</label>
        <div class="flex gap">
          <input type="text" wire:model="options.{{ $index }}">
          <button class="btn" wire:click.prevent="removeOption({{$index}})">Remove</button>
        </div>
      </div>
      
      @endforeach
    </div>

  </div> 