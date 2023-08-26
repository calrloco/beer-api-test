/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/js/**/*.svelte',
        './resources/**/*.blade.php',
        require('path').join(require.resolve(
                '@skeletonlabs/skeleton'),
            '../**/*.{html,js,svelte,ts}'
        ),
    ],
    theme: {
        extend: {},
    },
    plugins: [
        // 3. Append the Skeleton plugin to the end of this list
        ...require('@skeletonlabs/skeleton/tailwind/skeleton.cjs')(),
        require('@tailwindcss/forms'),
    ]
}

