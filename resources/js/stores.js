import {writable} from 'svelte/store';
import {localStorageStore} from "@skeletonlabs/skeleton";

export const tokenStore = localStorageStore('tokenStore', null);
export const pageStore =  writable(1);
export const perPageStore =  writable(9);
