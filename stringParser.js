
class FileFieldParser {
  constructor() {
    this.fields = []
  }

  parse(content) {

    // get first occuring value
    const opened = content.indexOf('{') + 1
    const closed = content.indexOf('}')
    const value = content.substring(opened, closed)

    // append value to fields array
    if (!this.fields.includes(value) && value !== '') {
      this.fields.push(value.toLowerCase())
    }

    // return fields array
    if (content.indexOf('{') === -1) {
      return this.fields
    }

    // or parse recursively
    content = content.substring(closed + 1, content.length)
    return this.parse(content)
  }
}

module.exports = FileFieldParser
