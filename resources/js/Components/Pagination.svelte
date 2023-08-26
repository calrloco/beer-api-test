<script>
    import Icon from "@iconify/svelte";
    import {pageStore, perPageStore} from '../stores.js'

    export let fetching;
</script>
<div role="navigation" class="w-full max-w-4xl h-[50px] mt-3 flex justify-end">
    <div class="flex">
        <select on:change={(e)=>perPageStore.set(e.target.value)}
                class="select w-[70px] variant-filled mr-2">
            <option value="9">9</option>
            <option value="18">18</option>
            <option value="24">27</option>
        </select>
    </div>
    <button disabled={fetching || $pageStore === 1} on:click={()=>pageStore.set($pageStore - 1)} type="button"
            class="btn variant-filled">
        <Icon icon="mdi:chevron-left"/>
    </button>
    <div class="h-full p-5 bg-white flex justify-center items-center">
        <p class="font-bold">{$pageStore}</p>
    </div>
    <button disabled={fetching} on:click={()=>pageStore.set($pageStore + 1)} type="button"
            class="btn  variant-filled">
        <Icon icon="mdi:chevron-right"/>
    </button>
</div>
