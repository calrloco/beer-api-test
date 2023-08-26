<script>
    import axios from "axios";
    import {tokenStore} from '../stores.js'

    export let onSuccess;

    const values = {
        email: 'root@root.it',
        password: 'password',
    }

    let errors = {
        email: '',
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
            <span class="pl-1">Email</span>
            <input
                class:input-error={errors?.email}
                class="input px-2 py-1.5 outline-none"
                bind:value={values.email} title="Email" autocomplete="email"

                placeholder="Email" name="email"/>
            {#if errors?.email}
                <p class="ml-4 text-error-500">{errors.email}</p>
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

