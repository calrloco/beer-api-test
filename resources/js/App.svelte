<script lang="js">
    import Login from "./Components/Login.svelte";
    import {tokenStore, pageStore, perPageStore} from './stores.js'
    import axios from "axios";
    import {onMount} from 'svelte';
    import Pagination from "./Components/Pagination.svelte";
    import Card from "./Components/Card.svelte";
    import {scale, fade} from 'svelte/transition';

    let beers = null
    let fetching = true


    // subscribing to page and per page store
    // as soon as the value change the callback is triggered
    pageStore.subscribe((page) => {
        getBeers({page: page})
    });
    perPageStore.subscribe((value) => {
        getBeers({per_page: value})
    });

    async function getBeers(pagination = {page: null, per_page: null}) {
        // if we have no token we trigger the login
        if (!$tokenStore) {
            fetching = false
            return
        }
        const {page, per_page} = pagination
        fetching = true
        try {
            const response = await axios.get(route('beers.index'), {
                headers: {
                    Authorization: `Bearer ${$tokenStore}`,
                    Accept: 'application/json',
                },
                params: {
                    page: page || $pageStore,
                    per_page: per_page || $perPageStore,
                }
            });
            beers = [...response.data.beers]
            if (!beers.length) {
                pageStore.set(1)
                return
            }
            window.scrollTo(0, 0)
        } catch (e) {
            if (e.response.status === 401) {
                tokenStore.set(null)
            }
        } finally {
            fetching = false
        }
    }

    async function logOut() {
        await axios.post(route('logout'), {}, {
            headers: {
                Authorization: `Bearer ${$tokenStore}`,
                Accept: 'application/json',
            },
        }).then(() => tokenStore.set(null))
    }

    onMount(async () => {
        await getBeers()
    });
</script>
<div class="w-full md:bg-[transparent] bg-gray-800 z-[1] md:absolute top-0 flex justify-end pt-5 pr-5">
    <button on:click={logOut} class="btn variant-filled">Logout</button>
</div>
<main class="z-[2] bg-gray-800 min-h-screen flex flex-col items-center py-10">
    {#if $tokenStore && beers?.length}
        <div in:fade class="grid max-w-4xl md:grid-cols-3 md:px-0 px-5 w-full gap-4">
            {#each beers as beer, id}
                <Card beer={beer}/>
            {/each}
        </div>
        <Pagination fetching={fetching}/>
    {:else if !$tokenStore && !fetching }
        <div in:scale out:scale class="absolute inset-0 grid place-items-center">
            <Login onSuccess={()=>getBeers()}/>
        </div>
    {/if}
</main>
