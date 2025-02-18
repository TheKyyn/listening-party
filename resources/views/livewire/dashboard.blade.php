<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;
use App\Models\ListeningParty;
use App\Models\Episode;

new class extends Component {
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required')]
    public $startTime;

    #[Validate('required|url')]
    public string $mediaUrl = '';

    public function createListeningParty()
    {
        $this->validate();

        $episode = Episode::create([
            'media_url' => $this->mediaUrl,
        ]);

        $listeningParty = ListeningParty::create([
            'name' => $this->name,
            'episode_id' => $episode->id,
            'start_time' => $this->startTime,
        ]);

        return redirect()->route('parties.show', $listeningParty);
    }

    public function with()
    {
        return [
            'listening_parties' => ListeningParty::all(),
        ];
    }
}; ?>

<div class="flex items-center justify-center min-h-screen bg-slate-50">
    <div class="max-w-lg w-full px-4">
        <form wire:submit='createListeningParty' class="space-y-6">
            <x-input wire:model='name' placeholder="Listening Party Name" />
            <x-input wire:model="mediaUrl" placeholder="Podcast RSS Feed URL"
                description="Entering the RSS Feed URL will grab the latest episode" />
            <x-datetime-picker wire:model='startTime' placeholder="Listening Party : Start Time" :min="now()->subDays(1)" />
            <x-button type="submit">{{ __('Create a Listening Party') }}</x-button>
        </form>
    </div>
</div>
