<script>
    export let beer;
</script>
<div class="block card card-hover p-4">
    <img class="h-[200px] w-full object-contain" src={beer.image_url}>
    <div class="border-gray-300 mt-3">
        <p class="text-center h4">{beer.name}</p>
        <p class="text-center mt-2 font-bold">{beer.tagline}</p>
    </div>
</div>
