
    <form wire:submit="submit">
        <flux:input type="hidden" name="user_id" wire:model="form.user_id" />
        <flux:error name="user_id" />

        <flux:input type="number" class="mb-4" name="weight" label="Weight" placeholder="Enter your weight" wire:model="form.weight" required />
        <flux:error name="weight" />

        <flux:input type="number" class="mb-4" name="systolic" label="Systolic" placeholder="Enter your systolic" wire:model="form.systolic" required />
        <flux:error name="systolic" />

        <flux:input type="number" class="mb-4" name="diastolic" label="Diastolic" placeholder="Enter your diastolic" wire:model="form.diastolic" required />
        <flux:error name="diastolic" />

        <flux:input type="number" class="mb-4" name="pulse" label="Pulse" placeholder="Enter your pulse" wire:model="form.pulse" required />
        <flux:error name="pulse" />

        <flux:input type="date" class="mb-4" name="date" label="Date" placeholder="Enter the date" wire:model="form.date" required />
        <flux:error name="date" />

        <flux:input type="time" class="mb-4" name="time" label="Time" placeholder="Enter the time" wire:model="form.time" required />
        <flux:error name="time" />

        <flux:input type="text" class="mb-4" name="notes" label="Notes" placeholder="Enter any notes" wire:model="form.notes" />
        <flux:error name="notes" />

        <div class="flex items-center justify-end mt-4">
            <flux:button type="submit">
                Submit
            </flux:button>
        </div>
    </form>
