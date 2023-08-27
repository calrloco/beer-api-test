<script>
    import axios from "axios";
    import {tokenStore} from '../stores.js'
    import Input from "./Input.svelte";

    export let onSuccess;

    const values = {
        username: 'root',
        password: 'password',
    }

    let errors = {
        username: '',
    }

    async function handleSubmit() {
        try {
            const response = await axios.post('/login', values);
            const data = response.data;
            if (data.message === 'success') {
                tokenStore.set(data.token);
                await onSuccess()
            }
        } catch (e) {
            errors = e.response.data.errors
        }
    }
</script>

<div class="card  py-10 px-5">
    <form on:submit|preventDefault={handleSubmit} class="lg:min-w-[500px] space-y-7">
        <Input label="Username" bind:value={values.username} error={errors.username} />
        <Input  label="Password" type={'password'} bind:value={values.password} />
        <div class="w-full flex justify-end space-x-4">
            <button type="submit" class="btn variant-filled">Login</button>
        </div>
    </form>
</div>

