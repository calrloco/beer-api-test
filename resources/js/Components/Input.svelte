<script>
    export let value, type, label, error = '';

    function typeAction(node) {
        node.type = type || 'text';
    }
</script>
<div class="label">
    <span class="text-sm font-bold uppercase text-gray-700">{label}</span>
    <input
        use:typeAction
        class:input-error={error}
        class="input px-2 py-1.5 outline-none"
        bind:value={value}
        placeholder={label}
    />
    {#if error}
        <p class="ml-4 text-error-500">{error}</p>
    {/if}
</div>
