@props(['expiresAt'])

<span x-data="{
    expiresAt: new Date('{{ $expiresAt->toIso8601String() }}').getTime(),
    now: Date.now(),
    days: 0,
    hours: 0,
    minutes: 0,
    seconds: 0,
    init() {
        this.updateCountdown();
        setInterval(() => {
            this.updateCountdown();
        }, 1000);
    },
    updateCountdown() {
        this.now = Date.now();
        const distance = this.expiresAt - this.now;

        if (distance > 0) {
            this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
            this.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            this.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            this.seconds = Math.floor((distance % (1000 * 60)) / 1000);
        }
    }
}" class="tabular-nums">
    <span x-text="days"></span>d
    <span x-text="hours"></span>h
    <span x-text="minutes"></span>m
    <span x-text="seconds"></span>s
</span>
