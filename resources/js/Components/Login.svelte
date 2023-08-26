<script>
    import axios from "axios";
    import {tokenStore} from '../stores.js'

    export let onSuccess;

    const values = {
        username: 'root',
        password: 'password',
    }

    let errors = {
        username: '',
        password: '',
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
        <div class="label">
            <span class="pl-1">Username</span>
            <input
                class:input-error={errors?.username}
                class="input px-2 py-1.5 outline-none"
                bind:value={values.username} title="Username"
                placeholder="Username" name="username"/>
            {#if errors?.username}
                <p class="ml-4 text-error-500">{errors.username}</p>
            {/if}
        </div>
        <div class="label">
            <span class="pl-1">Password</span>
            <input bind:value={values.password}
                   class:input-error={errors?.password}
                   class={errors?.password === 'baz' ? 'selected' : '' + 'input px-2 py-1.5 outline-none'}
                   title="Email" type="password"
                   name="password"
                   placeholder="Password"/>
            {#if errors?.password}
                <p class="ml-4 text-error-500">{errors.password}</p>
            {/if}
        </div>
        <div class="w-full flex justify-end space-x-4">
            <button type="submit" class="btn variant-filled">Login</button>
        </div>
    </form>
</div>

