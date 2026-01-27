export interface User {
    id: number
    name: string
    slug: string
}

export interface Post {
    id: number
    text: string | null
    created_at: string

    likes_count: number
    liked_by_me: boolean

    comments_count: number
    reposts_count: number
    reposted_by_me: boolean

    user: User
}

export interface FeedItem {
    actor: {
        id: number
        name: number
        slug: string
    }
    feed_created_at: string
    feed_id: number
    feed_type: 'post' | 'repost' | 'quote' | 'comment'
    post_id: number
    post: Post
}