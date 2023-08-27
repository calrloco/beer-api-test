<script>
    import Icon from "@iconify/svelte";
    import {pageStore, perPageStore} from '../stores.js'

    export let fetching;
    const perPageOptions = Array.from({ length: 3 }, (_, i) => 9 * (i + 1));
</script>
<div role="navigation" class="w-full lg:max-w-4xl px-5 lg:px-0 h-[50px] mt-3 flex justify-end">
    <div class="flex">
        <select value={$perPageStore} on:change={(e)=>perPageStore.set(e.target.value)}
                class="select w-[70px] variant-filled mr-2">
            {#each perPageOptions as option, i}
                <option value={`${option}`}>{option}</option>
            {/each}
        </select>
    </div>
    <button disabled={fetching || $pageStore === 1} on:click={()=>pageStore.set($pageStore - 1)} type="button"
            class="btn variant-filled">
        <Icon icon="mdi:chevron-left"/>
    </button>
    <div class="h-full p-5 bg-white flex justify-center items-center">
        <p class="font-bold">{$pageStore}</p>
    </div>
    <button disabled={fetching} on:click={()=>pageStore.set($pageStore + 1)} type="button" class="btn  variant-filled">
        <Icon icon="mdi:chevron-right"/>
    </button>
</div>
