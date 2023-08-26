<script>
    export let beer;
</script>
<div class="block card card-hover">
    <img alt={beer.name} class="h-[200px] w-full object-contain p-4" src={beer.image_url} />
    <div class="border-gray-300  mt-3 min-h-[75px] variant-filled grid place-items-center">
        <p class="text-center  font-bold text-sm">{beer.name}</p>
    </div>
</div>
