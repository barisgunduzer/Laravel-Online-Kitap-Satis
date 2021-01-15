<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @if (session()->has('message'))
        <div class = "alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <form class="review-from" wire:submit.prevent="store">
        @csrf
        <div class="form-group">
            <input class="input" wire:model="subject" type="text" placeholder="Subject" />
            @error('subject') <span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <textarea class="input" wire:model="review" type="text" placeholder="Your review" />
            @error('review') <span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <div class="input-rating">
                @error('rate') <span class="text-danger">{{$message}}</span>@enderror
                <strong class="text-uppercase">Your Rating: </strong>
                <div class="stars">
                    <input type="radio" id="star5" wire:model="rate" value="5"/><label for="star5"></label>
                    <input type="radio" id="star4" wire:model="rate" value="4"/><label for="star5"></label>
                    <input type="radio" id="star3" wire:model="rate" value="3"/><label for="star5"></label>
                    <input type="radio" id="star2" wire:model="rate" value="2"/><label for="star5"></label>
                    <input type="radio" id="star1" wire:model="rate" value="1"/><label for="star5"></label>
                </div>
            </div>
        </div>
        @auth
            <input type="submit" class="btn btn-success" value="Save"/>
        @else
            <a href="/login" class="btn-primary">For Submit Review Login</a>
        @endauth
    </form>
</div>
