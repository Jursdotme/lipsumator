# lipsumator

## What is Lipsumator?

Lipsumator makes it easy to mock up page layouts with temporary text. When it is time to insert the final content you can turn on the "Highlight mode" to easily make sure you dont leave any placeholder text when the site goes live.

### Syntax

Example:

```
[lipsumator type="s" count="1" tag="h1"]
```

#### Type

This is defining the type of placeholder content you want to generate. It accepts one of 3 arguments:

- `w`: Generate single words.
- `s`: Generate sentences.
- `p`: Generate paragraphs.

#### Count

The count argument indicates the number of words, sentences or paragraphs you generate, based on the type argument.

#### Tag

Tag defines the type of element tag you want to wrap your generated placeholder content in. Words and sentences are wrapt into a single tag. Paragraphs are wrapt individually.
