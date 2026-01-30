import { NextResponse } from 'next/server';

const categories = [
  { id: 'electronics', name: 'ইলেকট্রনিক্স' },
  { id: 'accessories', name: 'এক্সেসরিজ' },
  { id: 'health', name: 'স্বাস্থ্য' },
  { id: 'clothing', name: 'পোশাক' },
];

export async function GET() {
  try {
    return NextResponse.json(categories);
  } catch (error) {
    console.error('Error fetching categories:', error);
    return NextResponse.json({ error: 'Failed to fetch categories' }, { status: 500 });
  }
}
