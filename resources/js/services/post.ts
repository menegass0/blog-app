export async function toggleLikePost(postId){
     try {
        const response = await fetch(
            route('posts.like', postId),
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        ?.getAttribute('content') ?? '',
                    'Accept': 'application/json',
                },
            }
        )

        if (!response.ok) {
            throw new Error('Failed to like post')
        }

        const data = await response.json()

    } catch (error) {
        console.error(error)
    }
}   